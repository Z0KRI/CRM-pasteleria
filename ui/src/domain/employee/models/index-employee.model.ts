import { IResponseAPI } from "@/common/interfaces";
import { IEmployeeModel } from "./employee.model";

export interface IIndexEmployeeModel extends IResponseAPI {
    data: IEmployeeModel[]
}