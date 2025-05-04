export interface Note {
    id: number;
    title: string;
    content: string;
    archived: boolean;
    tags: Tag[];
    created_at: string | null;
    updated_at: string | null;
}

export interface Tag {
    id: number;
    name: string;
    created_at: string | null;
    updated_at: string | null;
}
