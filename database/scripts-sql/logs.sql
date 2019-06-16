CREATE TABLE public.logs
(
    id integer NOT NULL DEFAULT nextval('logs_id_seq'::regclass),
    observation text COLLATE pg_catalog."default" NOT NULL,
    surgery_id bigint NOT NULL,
    status_id bigint NOT NULL,
    user_id bigint NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT logs_pkey PRIMARY KEY (id),
    CONSTRAINT logs_status_id_foreign FOREIGN KEY (status_id)
        REFERENCES public.status (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT logs_surgery_id_foreign FOREIGN KEY (surgery_id)
        REFERENCES public.surgeries (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT logs_user_id_foreign FOREIGN KEY (user_id)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);