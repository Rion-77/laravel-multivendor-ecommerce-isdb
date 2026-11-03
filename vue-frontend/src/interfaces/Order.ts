export interface OrderListItem {
  id: number;
  quantity: number;
  unit_price: string;
  product: {
    id: number;
    name: string;
    category: { name: string } | null;
    brand: { name: string } | null;
    vendor: {
      id: number;
      shop_name: string;
      commission_rate: number | string;
    } | null;
  } | null;
}

export const defaultOrderListItem: OrderListItem = {
  id: 0,
  quantity: 0,
  unit_price: "0.00",
  product: null,
};

export interface AdminOrder {
  id: number;
  order_number: string;
  user_id: number | null;
  guest_name: string | null;
  guest_email: string | null;
  guest_phone: string | null;
  shipping_recipient_name: string;
  shipping_phone: string;
  shipping_address_line: string;
  shipping_district: string | null;
  subtotal_amount: string;
  shipping_fee: string;
  total_amount: string;
  order_status_id: number;
  user: {
    name: string;
    email: string;
    phone: string;
  } | null;
  created_at: string;
  order_status: {
    name: string;
  } | null;
  order_items: OrderListItem[];
}

export const defaultAdminOrder: AdminOrder = {
  id: 0,
  order_number: "",
  user_id: null,
  guest_name: null,
  guest_email: null,
  guest_phone: null,
  shipping_recipient_name: "",
  shipping_phone: "",
  shipping_address_line: "",
  shipping_district: null,
  subtotal_amount: "0.00",
  shipping_fee: "0.00",
  total_amount: "0.00",
  order_status_id: 0,
  user: null,
  created_at: "",
  order_status: null,
  order_items: [],
};
