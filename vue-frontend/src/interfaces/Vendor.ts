export interface Vendor {
  id: number;
  shop_name: string;
  logo_url: string;
  slug: string;
  description: string;
  commission_rate: number | string;
  status: string;
  products_count: number;
}

export const defaultVendor: Vendor = {
  id: 0,
  shop_name: "",
  logo_url: "",
  slug: "",
  description: "",
  commission_rate: 0,
  status: "",
  products_count: 0,
};
