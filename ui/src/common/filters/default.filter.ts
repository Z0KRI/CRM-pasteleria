export interface IDefaultFilter {
    paginated?: boolean
    page?: number
    'per-page'?: number
    search?: string
    'order-by'?: string
    order?: 'asc' | 'desc'
}