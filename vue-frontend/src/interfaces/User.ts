export interface AdminUser {
  id: number;
  name: string;
  email: string;
  phone: string;
  role: {
    name: string;
  } | null;
  orders_count?: number;
  orders_sum_total_amount?: string | null;
  created_at: string;
}

export const defaultAdminUser: AdminUser = {
  id: 0,
  name: "",
  email: "",
  phone: "",
  role: null,
  orders_count: 0,
  orders_sum_total_amount: null,
  created_at: "",
};
