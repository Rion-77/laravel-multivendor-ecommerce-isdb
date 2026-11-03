export interface OrderStatusOption {
  id: number;
  name: string;
}

export const defaultOrderStatusOption: OrderStatusOption = {
  id: 0,
  name: "",
};

export interface AdminOrderStatus {
  id: number;
  name: string;
  orders_count: number;
}

export const defaultAdminOrderStatus: AdminOrderStatus = {
  id: 0,
  name: "",
  orders_count: 0,
};
