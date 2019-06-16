CREATE SEQUENCE status_id_seq;
CREATE TABLE public.status
(
    id integer NOT NULL DEFAULT nextval('status_id_seq'::regclass),
    name character varying(20) COLLATE pg_catalog."default" NOT NULL,
    description text COLLATE pg_catalog."default" NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT status_pkey PRIMARY KEY (id),
    CONSTRAINT status_name_unique UNIQUE (name)
);
