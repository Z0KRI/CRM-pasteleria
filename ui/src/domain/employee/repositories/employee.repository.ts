import {
    ICreateEmployeeModel,
    IUpdateEmployeeModel,
    IIndexEmployeeModel,
    IEmployeeModel,
} from "../models";
import { CrudRepository } from "@/domain/common/repositories/crud.repository";

export abstract class EmployeeRepository extends CrudRepository<
    IEmployeeModel,
    IIndexEmployeeModel,
    ICreateEmployeeModel,
    IUpdateEmployeeModel
> {
}