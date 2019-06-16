CREATE TABLE public.anesthetics
(
    id integer NOT NULL DEFAULT nextval('anesthetics_id_seq'::regclass),
    name character varying(70) COLLATE pg_catalog."default" NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT anesthetics_pkey PRIMARY KEY (id),
    CONSTRAINT anesthetics_name_unique UNIQUE (name)

);