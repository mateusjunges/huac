CREATE SEQUENCE surgeon_has_surgeries_id_seq;
CREATE TABLE public.surgeon_has_surgeries
(
    id integer NOT NULL DEFAULT nextval('surgeon_has_surgeries_id_seq'::regclass),
    head_surgeon boolean NOT NULL,
    surgeon_id bigint NOT NULL,
    surgery_id bigint NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT surgeon_has_surgeries_pkey PRIMARY KEY (id),
    CONSTRAINT surgeon_has_surgeries_surgeon_id_foreign FOREIGN KEY (surgeon_id)
        REFERENCES public.surgeons (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT surgeon_has_surgeries_surgery_id_foreign FOREIGN KEY (surgery_id)
        REFERENCES public.surgeries (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);
