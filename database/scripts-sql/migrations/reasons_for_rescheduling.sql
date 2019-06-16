CREATE SEQUENCE reasons_for_rescheduling_id_seq;
CREATE TABLE public.reasons_for_rescheduling
(
    id integer NOT NULL DEFAULT nextval('reasons_for_rescheduling_id_seq'::regclass),
    name character varying(70) COLLATE pg_catalog."default" NOT NULL,
    description text COLLATE pg_catalog."default" NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT reasons_for_rescheduling_pkey PRIMARY KEY (id),
    CONSTRAINT reasons_for_rescheduling_name_unique UNIQUE (name)
);
