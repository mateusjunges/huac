CREATE TABLE public.user_has_groups
(
    user_id bigint NOT NULL,
    group_id bigint NOT NULL,
    CONSTRAINT user_has_groups_pkey PRIMARY KEY (user_id, group_id),
    CONSTRAINT user_has_groups_group_id_foreign FOREIGN KEY (group_id)
        REFERENCES public.groups (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT user_has_groups_user_id_foreign FOREIGN KEY (user_id)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE
);