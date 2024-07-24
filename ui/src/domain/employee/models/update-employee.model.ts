import { IEmployeeModel } from "./employee.model";

type IUpdateEmployee = Omit<IEmployeeModel, 'id'>

export type IUpdateEmployeeModel = Partial<IUpdateEmployee>