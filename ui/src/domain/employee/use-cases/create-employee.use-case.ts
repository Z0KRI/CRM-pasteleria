import { EmployeeRepository } from "../repositories/employee.repository";
import { IUseCase } from "@/domain/common/interfaces/use-case.interface";
import { ICreateEmployeeModel, IEmployeeModel } from "../models";

export class CreateEmployeeUseCase implements IUseCase<IEmployeeModel, ICreateEmployeeModel> {
    constructor(
        private readonly employeeRepository: EmployeeRepository
    ) { }

    async execute(payload: ICreateEmployeeModel): Promise<IEmployeeModel> {
        return await this.employeeRepository.create(payload)
    }
}