<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function order()
    {
        $orders = Order::with(['customer', 'orderItems.product'])->latest()->paginate(5);
        return view('admin.order.order', compact('orders'));
    }

    public function delete($id)
    {
        try {
            $order = Order::find($id);
            if ($order) {
                $order->orderItems()->delete(); // Xóa các mục trong bảng order_items trước
                $order->delete(); // Sau đó xóa order
            }
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }

    public function Status($id)
    {
        $order = Order::find($id);
        $statuses = Order::getStatuses();
        return view('admin.order.status', compact('order', 'statuses'));
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $order = Order::find($id);
            $order->status = $request->input('status');
            $order->save();

            return redirect()->route('order.order', ['id' => $id])
                             ->with('success', 'Trạng thái đơn hàng được cập nhật thành công.');
        } catch (\Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . ' --- Line: ' . $exception->getLine());
            return redirect()->route('order.status', ['id' => $id])
                             ->with('error', 'Failed to update order status.');
        }
    }

    public function thongkedonhang(Request $request)
    {
        $date = $request->input('date');
    
        $totalOrders = 0;
        $paidOrders = 0;
        $unpaidOrders = 0;
        $totalRevenue = 0;
    
        if ($date) {
            $orders = Order::whereDate('created_at', $date)->get();
            $totalOrders = $orders->count();
            $paidOrders = $orders->where('status', 'paid')->count();
            $unpaidOrders = $orders->where('status', 'unpaid')->count();
            $totalRevenue = $orders->where('status', 'paid')->sum('total_price');
        }
    
        return view('admin.order.thongkedonhang', compact('totalOrders', 'paidOrders', 'unpaidOrders', 'totalRevenue'));
    }
    
    
}
