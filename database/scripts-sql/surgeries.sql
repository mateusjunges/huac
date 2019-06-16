CREATE TABLE public.surgeries
(
    id integer NOT NULL DEFAULT nextval('surgeries_id_seq'::regclass),
    estimated_duration_time integer NOT NULL,
    anesthetic_evaluation text COLLATE pg_catalog."default",
    materials text COLLATE pg_catalog."default" NOT NULL,
    observation text COLLATE pg_catalog."default",
    procedure_id bigint NOT NULL,
    surgery_classification_id bigint NOT NULL,
    patient_id bigint NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT surgeries_pkey PRIMARY KEY (id),
    CONSTRAINT surgeries_patient_id_foreign FOREIGN KEY (patient_id)
        REFERENCES public.patients (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT surgeries_procedure_id_foreign FOREIGN KEY (procedure_id)
        REFERENCES public.procedures (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT surgeries_surgery_classification_id_foreign FOREIGN KEY (surgery_classification_id)
        REFERENCES public.surgery_classifications (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);