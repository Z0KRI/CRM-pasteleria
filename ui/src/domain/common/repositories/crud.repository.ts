export abstract class CrudRepository<T, I, C, U> {
    abstract get(id: string | number): Promise<T>

    abstract getAll(filters: any, origin?: string[] | undefined): Promise<I>

    abstract create(payload: C, origin?: string[] | undefined): Promise<T>

    abstract update(id: string, payload: U): Promise<T>

    abstract delete(id: string): Promise<T>
}