CREATE TABLE public.user_has_permissions
(
    user_id bigint NOT NULL,
    permission_id bigint NOT NULL,
    CONSTRAINT user_has_permissions_pkey PRIMARY KEY (user_id, permission_id),
    CONSTRAINT user_has_permissions_permission_id_foreign FOREIGN KEY (permission_id)
        REFERENCES public.permissions (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT user_has_permissions_user_id_foreign FOREIGN KEY (user_id)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE
);