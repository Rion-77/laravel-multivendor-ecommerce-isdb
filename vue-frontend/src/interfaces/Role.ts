export interface AdminRole {
  id: number;
  name: string;
  users_count: number;
}

export const defaultAdminRole: AdminRole = {
  id: 0,
  name: "",
  users_count: 0,
};
