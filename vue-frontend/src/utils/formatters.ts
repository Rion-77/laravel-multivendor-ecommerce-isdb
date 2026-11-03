//Badge Color
export function statusBadgeClass(status: string) {
  const classes: Record<string, string> = {
    active: "bg-label-success",
    pending_review: "bg-label-warning",
    rejected: "bg-label-danger",
    draft: "bg-label-secondary",
    inactive: "bg-label-dark",
    out_of_stock: "bg-label-info",
    suspended: "bg-label-dark",
    pending: "bg-label-warning",
    confirmed: "bg-label-info",
    packed: "bg-label-primary",
    shipped: "bg-label-info",
    delivered: "bg-label-success",
    cancelled: "bg-label-danger",
    returned: "bg-label-secondary",
    return_requested: "bg-label-warning",
  };

  return classes[status] ?? "bg-label-secondary";
}


export function formatStatus(status: string) {
  return status.replace(/_/g, " ").replace(/\b\w/g, (letter) => letter.toUpperCase());
}

export function formatDate(date: string | undefined) {
  if (!date) return "—";

  const parsedDate = new Date(date);
  return Number.isNaN(parsedDate.getTime())
    ? "—"
    : new Intl.DateTimeFormat("en-GB", { day: "2-digit", month: "short", year: "numeric" }).format(parsedDate);
}

export function formatPrice(price: string) {
  return price ? `$${price}` : "—";
}