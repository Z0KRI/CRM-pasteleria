import { IDefaultFilter } from './default.filter';
export interface IEmployeeFilter extends IDefaultFilter {
    job_id?: string
    store_id?: string
}