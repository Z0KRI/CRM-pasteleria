import { ICreateEmployeeModel, IEmployeeModel, IIndexEmployeeModel, IUpdateEmployeeModel } from "@/domain/employee/models";
import { EmployeeRepository } from "@/domain/employee/repositories/employee.repository";
import { EmployeeService } from "@/infrastructure/services";
import { EmployeeMapper } from "../mappers/employee.mapper";
import { EmployeeEntityMapper } from "../mappers/employee-entity.mapper";

export class EmployeeImpRepository extends EmployeeRepository {
    constructor(
        private readonly service: EmployeeService
    ) {
        super()
    }

    override async get(id: string): Promise<IEmployeeModel> {
        return await this.service
            .getById(id).then(async (resp) => EmployeeMapper.toMap(resp.data))
    }

    override async getAll(filters: any): Promise<IIndexEmployeeModel> {
        return await this.service
            .getAll(filters).then(async (resp) => EmployeeMapper.mapToIndex(resp))
    }

    override async create(payload: ICreateEmployeeModel): Promise<IEmployeeModel> {
        return await this.service
            .create(EmployeeEntityMapper.toCreateMap(payload))
            .then(async (resp) => EmployeeMapper.toMap(resp.data))
    }

    override async update(id: string, payload: IUpdateEmployeeModel): Promise<IEmployeeModel> {
        return await this.service
            .update(id, EmployeeEntityMapper.toUpdateMap(payload))
            .then(async (resp) => EmployeeMapper.toMap(resp.data))
    }

    override async delete(id: string): Promise<IEmployeeModel> {
        return await this.service
            .delete(id)
            .then(async (resp) => EmployeeMapper.toMap(resp.data))
    }
}