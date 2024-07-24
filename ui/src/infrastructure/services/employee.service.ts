import { UtilClass, HTTPClass } from "../common/classes";
import { IEmployeeFilter } from "@/common/filters";
import type { Router } from 'vue-router';
import { inject, injectable } from "inversify";
import { environment } from "@/env";
import { ICreateEmployee, IEmployeeIndexResponse, IEmployeeResponse, IUpdateEmployee } from "../interfaces";

@injectable()
export class EmployeeService extends UtilClass {
    private readonly url = `${environment.HOST}/${environment.APIpath}/${environment.version}/employees`

    constructor(
        @inject('HTTPClass')
        private http: HTTPClass,
        @inject('Router')
        router: Router
    ) {
        super(router)
    }

    async getAll(params: IEmployeeFilter): Promise<IEmployeeIndexResponse> {
        return await this.http
            .get<IEmployeeIndexResponse>(
                this.url,
                this.params(params),
                this.headers()
            )
    }

    async getById(employeeId: string): Promise<IEmployeeResponse> {
        return await this.http
            .get<IEmployeeResponse>(`${this.url}/${employeeId}`, ``, this.headers())
    }

    async create(payload: ICreateEmployee): Promise<IEmployeeResponse> {
        return await this.http
            .post<IEmployeeResponse>(this.url, payload, this.headers())
    }

    async update(employeeId: string, payload: IUpdateEmployee): Promise<IEmployeeResponse> {
        return await this.http
            .patch(`${this.url}/${employeeId}`, payload, this.headers())
    }

    async delete(employeeId: string): Promise<IEmployeeResponse> {
        return await this.http
            .delete(`${this.url}/${employeeId}`, this.headers())
    }
}