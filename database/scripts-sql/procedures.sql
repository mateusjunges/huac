CREATE TABLE public.procedures
(
    id integer NOT NULL DEFAULT nextval('procedures_id_seq'::regclass),
    name character varying(70) COLLATE pg_catalog."default" NOT NULL,
    sus_code character varying(50) COLLATE pg_catalog."default" NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT procedures_pkey PRIMARY KEY (id),
    CONSTRAINT procedures_sus_code_unique UNIQUE (sus_code)
);