<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FileImportController extends Controller
{
    /**
     * Import users from text file
     * File format:
     * name=Nguyen Van A
     * email=nguyenvana@email.com
     * password=123456
     * phone=0123456789
     * address=123 ABC Street, XYZ City
     * ---
     */
    public function importUsers(Request $request)
    {
        $request->validate([
            'import_file' => 'required|file|mimes:txt|max:2048'
        ]);

        $file = $request->file('import_file');
        $content = file_get_contents($file->getPathname());
        
        // Split by --- to separate multiple users
        $userBlocks = explode('---', $content);
        $importedCount = 0;
        $errors = [];

        foreach ($userBlocks as $block) {
            $block = trim($block);
            if (empty($block)) continue;

            $userData = $this->parseUserData($block);
            
            if ($userData) {
                try {
                    // Check if user already exists
                    $existingUser = User::where('email', $userData['email'])->first();
                    
                    if (!$existingUser) {
                        // Create new user
                        $user = User::create([
                            'name' => $userData['name'],
                            'email' => $userData['email'],
                            'password' => Hash::make($userData['password']),
                            'email_verified_at' => now(),
                        ]);

                        // Create customer profile
                        if (isset($userData['phone']) || isset($userData['address'])) {
                            Customer::create([
                                'user_id' => $user->id,
                                'name' => $userData['name'],
                                'phone' => $userData['phone'] ?? '',
                                'address' => $userData['address'] ?? '',
                            ]);
                        }

                        $importedCount++;
                    } else {
                        $errors[] = "User with email {$userData['email']} already exists";
                    }
                } catch (\Exception $e) {
                    $errors[] = "Error creating user {$userData['email']}: " . $e->getMessage();
                }
            }
        }

        if ($importedCount > 0) {
            return redirect()->back()->with('success', "Successfully imported {$importedCount} users. " . 
                ($errors ? 'Errors: ' . implode(', ', $errors) : ''));
        } else {
            return redirect()->back()->with('error', 'No users imported. ' . implode(', ', $errors));
        }
    }

    /**
     * Export current user data to text file
     */
    public function exportUserData(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to export data');
        }

        $user = Auth::user();
        $customer = Customer::where('user_id', $user->id)->first();

        $exportData = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $customer ? $customer->phone : '',
            'address' => $customer ? $customer->address : '',
            'created_at' => $user->created_at->format('Y-m-d H:i:s'),
            'last_login' => now()->format('Y-m-d H:i:s'),
        ];

        // Add order statistics if available
        $orders = \App\Models\Order::where('user_id', $user->id)->get();
        $exportData['total_orders'] = $orders->count();
        $exportData['total_spent'] = $orders->sum('total_price');

        // Format data for text file
        $fileContent = "=== USER INFORMATION ===\n";
        $fileContent .= "Name: {$exportData['name']}\n";
        $fileContent .= "Email: {$exportData['email']}\n";
        $fileContent .= "Phone: {$exportData['phone']}\n";
        $fileContent .= "Address: {$exportData['address']}\n";
        $fileContent .= "Account Created: {$exportData['created_at']}\n";
        $fileContent .= "Data Exported: {$exportData['last_login']}\n";
        $fileContent .= "Total Orders: {$exportData['total_orders']}\n";
        $fileContent .= "Total Spent: " . number_format($exportData['total_spent']) . " VND\n";
        
        if ($orders->count() > 0) {
            $fileContent .= "\n=== ORDER HISTORY ===\n";
            foreach ($orders as $order) {
                $fileContent .= "Order #{$order->id} - " . $order->created_at->format('Y-m-d') . 
                               " - " . number_format($order->total_price) . " VND - {$order->status}\n";
            }
        }

        $fileContent .= "\n=== IMPORT FORMAT (for reference) ===\n";
        $fileContent .= "name=Your Full Name\n";
        $fileContent .= "email=your.email@example.com\n";
        $fileContent .= "password=your_password\n";
        $fileContent .= "phone=0123456789\n";
        $fileContent .= "address=Your Address\n";
        $fileContent .= "---\n";

        $fileName = 'user_data_' . $user->id . '_' . date('YmdHis') . '.txt';

        return response($fileContent)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');
    }

    /**
     * Parse user data from text block
     */
    private function parseUserData($block)
    {
        $lines = explode("\n", $block);
        $userData = [];

        foreach ($lines as $line) {
            $line = trim($line);
            if (empty($line) || !str_contains($line, '=')) continue;

            list($key, $value) = explode('=', $line, 2);
            $userData[trim($key)] = trim($value);
        }

        // Validate required fields
        if (!isset($userData['name']) || !isset($userData['email']) || !isset($userData['password'])) {
            return null;
        }

        return $userData;
    }

    /**
     * Show sample import file format
     */
    public function downloadSampleFile()
    {
        $sampleContent = "name=Nguyen Van A\n";
        $sampleContent .= "email=nguyenvana@example.com\n";
        $sampleContent .= "password=123456\n";
        $sampleContent .= "phone=0123456789\n";
        $sampleContent .= "address=123 ABC Street, XYZ City\n";
        $sampleContent .= "---\n";
        $sampleContent .= "name=Tran Thi B\n";
        $sampleContent .= "email=tranthib@example.com\n";
        $sampleContent .= "password=abcdef\n";
        $sampleContent .= "phone=0987654321\n";
        $sampleContent .= "address=456 DEF Street, UVW City\n";
        $sampleContent .= "---\n";

        return response($sampleContent)
            ->header('Content-Type', 'text/plain')
            ->header('Content-Disposition', 'attachment; filename="sample_users_import.txt"');
    }
}
