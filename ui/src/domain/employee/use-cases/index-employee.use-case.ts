import { IUseCase } from "@/domain/common/interfaces/use-case.interface";
import { IIndexEmployeeModel } from "../models";
import { IEmployeeFilter } from "@/common/filters";
import { EmployeeRepository } from "../repositories/employee.repository";

export class IndexEmployeeUseCase implements IUseCase<IIndexEmployeeModel, IEmployeeFilter> {
    constructor(
        private readonly employeeRepository: EmployeeRepository
    ) { }

    async execute(filters?: IEmployeeFilter): Promise<IIndexEmployeeModel> {
        return await this.employeeRepository.getAll(filters)
    }
}