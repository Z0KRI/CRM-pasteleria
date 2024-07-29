import { EmployeeRepository } from "../repositories/employee.repository";
import { IUseCase } from "@/domain/common/interfaces/use-case.interface";
import { IEmployeeModel } from "../models";

export class GetEmployeeUseCase implements IUseCase<IEmployeeModel, string> {
    constructor(
        private readonly employeeRepository: EmployeeRepository
    ) { }

    async execute(employeeId: string): Promise<IEmployeeModel> {
        return await this.employeeRepository.get(employeeId)
    }
}