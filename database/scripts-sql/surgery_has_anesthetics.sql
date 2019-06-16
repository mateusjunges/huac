CREATE SEQUENCE surgery_has_anesthetics_id_seq;
CREATE TABLE public.surgery_has_anesthetics
(
    id integer NOT NULL DEFAULT nextval('surgery_has_anesthetics_id_seq'::regclass),
    surgery_id bigint NOT NULL,
    anesthesia_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT surgery_anesthetics_pkey PRIMARY KEY (id),
    CONSTRAINT surgery_anesthetics_anesthesia_id_foreign FOREIGN KEY (anesthesia_id)
        REFERENCES public.anesthetics (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT surgery_anesthetics_surgery_id_foreign FOREIGN KEY (surgery_id)
        REFERENCES public.surgeries (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);
