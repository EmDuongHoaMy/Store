<?php

namespace App\Enums;

enum OrderStatus :int
{
    case Pending = 1;
    case Processing = 2;
    case Delivering = 3;
    case Completed = 4;
    case Finish = 5; 
    case Cancelled = 6;

    public function description(): string
    {
        return match($this) {
            self::Pending => 'Đặt hàng - Chờ xác nhận',
            self::Processing => 'Xác nhận thành công - Đang đóng gói',
            self::Delivering => 'Đóng gói hoàn tất - Đang giao hàng',
            self::Completed => 'Giao hàng thành công',
            self::Finish => 'Hoàn tất',
            self::Cancelled => 'Đơn hủy',

        };
    }
}
