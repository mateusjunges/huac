CREATE TABLE public.surgery_classifications
(
    id integer NOT NULL DEFAULT nextval('surgery_classifications_id_seq'::regclass),
    name character varying(70) COLLATE pg_catalog."default" NOT NULL,
    description text COLLATE pg_catalog."default" NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT surgery_classifications_pkey PRIMARY KEY (id),
    CONSTRAINT surgery_classifications_name_unique UNIQUE (name)
);