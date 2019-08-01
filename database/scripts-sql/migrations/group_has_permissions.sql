CREATE TABLE public.group_has_permissions
(
    group_id bigint NOT NULL,
    permission_id bigint NOT NULL,
    CONSTRAINT group_has_permissions_pkey PRIMARY KEY (group_id, permission_id),
    CONSTRAINT group_has_permissions_group_id_foreign FOREIGN KEY (group_id)
        REFERENCES public.groups (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT group_has_permissions_permission_id_foreign FOREIGN KEY (permission_id)
        REFERENCES public.permissions (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE
);