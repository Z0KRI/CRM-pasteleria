import { ICreateEmployeeModel, IUpdateEmployeeModel } from "@/domain/employee/models";
import { ICreateEmployee, IUpdateEmployee } from "@/infrastructure/interfaces";

export class EmployeeEntityMapper {
    static toUpdateMap(model: IUpdateEmployeeModel): IUpdateEmployee {
        const {
            paternalSurname,
            maternalSurname,
            storeId,
            userId,
            jobId,
            ...data
        } = model
        return {
            ...data,
            paternal_surname: paternalSurname,
            maternal_surname: maternalSurname,
            store_id: storeId,
            job_id: jobId,
            user_id: userId
        }
    }

    static toCreateMap(model: ICreateEmployeeModel): ICreateEmployee {
        const {
            paternalSurname,
            maternalSurname,
            storeId,
            userId,
            jobId,
            ...data
        } = model
        return {
            ...data,
            paternal_surname: paternalSurname,
            maternal_surname: maternalSurname,
            store_id: storeId,
            job_id: jobId,
            user_id: userId
        }
    }
}