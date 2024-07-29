import { IEmployeeModel } from "./employee.model";

export type ICreateEmployeeModel = Omit<IEmployeeModel, 'id'>