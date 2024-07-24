import { EmployeeRepository } from "@/domain/employee/repositories/employee.repository";
import { EmployeeImpRepository } from "./repository/employee.imp-repository";
import { EmployeeService } from "@/infrastructure/services";
import { HTTPClass } from "@/infrastructure/common/classes";
import { Router } from 'vue-router';
import {
    CreateEmployeeUseCase,
    GetEmployeeUseCase,
    IndexEmployeeUseCase,
    UpdateEmployeeUseCase
} from "@/domain/employee/use-cases";
import { provide } from "vue";
import container from "@/core/container";

export function EmployeeDataModule() {
    const router = container.get<Router>('Router')
    const http = new HTTPClass();
    const service = new EmployeeService(http, router);
    const repository = new EmployeeImpRepository(service);

    provide(EmployeeRepository, repository)

    provide(CreateEmployeeUseCase, new CreateEmployeeUseCase(repository))
    provide(IndexEmployeeUseCase, new IndexEmployeeUseCase(repository))
    provide(UpdateEmployeeUseCase, new UpdateEmployeeUseCase(repository))
    provide(GetEmployeeUseCase, new GetEmployeeUseCase(repository))
}