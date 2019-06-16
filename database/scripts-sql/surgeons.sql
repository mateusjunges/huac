CREATE TABLE public.surgeons
(
    id integer NOT NULL DEFAULT nextval('surgeons_id_seq'::regclass),
    crm character varying(20) COLLATE pg_catalog."default" NOT NULL,
    user_id bigint NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT surgeons_pkey PRIMARY KEY (id),
    CONSTRAINT surgeons_crm_unique UNIQUE (crm),
    CONSTRAINT surgeons_user_id_foreign FOREIGN KEY (user_id)
        REFERENCES public.users (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);