CREATE SEQUENCE permissions_id_seq;
CREATE TABLE public.permissions
(
    id bigint NOT NULL DEFAULT nextval('permissions_id_seq'::regclass),
    name character varying(50) COLLATE pg_catalog."default" NOT NULL,
    slug character varying(50) COLLATE pg_catalog."default" NOT NULL,
    description text COLLATE pg_catalog."default",
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT permissions_pkey PRIMARY KEY (id),
    CONSTRAINT permissions_name_unique UNIQUE (name)
);
