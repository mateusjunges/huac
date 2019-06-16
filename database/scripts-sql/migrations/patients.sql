CREATE SEQUENCE patients_id_seq;
CREATE TABLE public.patients
(
    id integer NOT NULL DEFAULT nextval('patients_id_seq'::regclass),
    name character varying(70) COLLATE pg_catalog."default" NOT NULL,
    birthday_at date NOT NULL,
    mother_name character varying(70) COLLATE pg_catalog."default" NOT NULL,
    gender character varying(255) COLLATE pg_catalog."default" NOT NULL,
    medical_record character varying(20) COLLATE pg_catalog."default" NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT patients_pkey PRIMARY KEY (id),
    CONSTRAINT patients_medical_record_unique UNIQUE (medical_record),
    CONSTRAINT patients_gender_check CHECK (gender::text = ANY (ARRAY['M'::character varying, 'F'::character varying, 'O'::character varying]::text[]))
);
