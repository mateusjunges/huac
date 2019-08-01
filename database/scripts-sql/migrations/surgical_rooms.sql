CREATE SEQUENCE surgical_rooms_id_seq;
CREATE TABLE public.surgical_rooms
(
    id integer NOT NULL DEFAULT nextval('surgical_rooms_id_seq'::regclass),
    name character varying(70) COLLATE pg_catalog."default" NOT NULL,
    available boolean NOT NULL DEFAULT true,
    morning_reservation_starts_at character varying(8) COLLATE pg_catalog."default" NOT NULL,
    morning_reservation_ends_at character varying(8) COLLATE pg_catalog."default" NOT NULL,
    afternoon_reservation_starts_at character varying(8) COLLATE pg_catalog."default" NOT NULL,
    afternoon_reservation_ends_at character varying(8) COLLATE pg_catalog."default" NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT surgical_rooms_pkey PRIMARY KEY (id),
    CONSTRAINT surgical_rooms_name_unique UNIQUE (name)
);
