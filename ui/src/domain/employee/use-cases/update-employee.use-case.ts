import { EmployeeRepository } from "../repositories/employee.repository";
import { IUseCase } from "@/domain/common/interfaces/use-case.interface";
import { IEmployeeModel, IUpdateEmployeeModel } from "../models";

export class UpdateEmployeeUseCase implements IUseCase<IEmployeeModel, IUpdateEmployeeModel> {
    constructor(
        private readonly employeeRepository: EmployeeRepository
    ) { }

    async executeWithId(payload: IUpdateEmployeeModel, id: string): Promise<IEmployeeModel> {
        return await this.employeeRepository.update(id, payload)
    }
}