import { IEmployeeEntity } from "../entities/employee.entity";
import { IResponseAPI } from "@/common/interfaces";

export type ICreateEmployee = Omit<IEmployeeEntity, 'id'>

export type IUpdateEmployee = Partial<ICreateEmployee>

export interface IEmployeeIndexResponse extends IResponseAPI {
    data: IEmployeeEntity[]
}

export interface IEmployeeResponse extends IResponseAPI {
    data: IEmployeeEntity
}