CREATE TABLE public.events
(
    id integer NOT NULL DEFAULT nextval('events_id_seq'::regclass),
    title character varying(70) COLLATE pg_catalog."default" NOT NULL,
    color character varying(7) COLLATE pg_catalog."default" NOT NULL,
    start_at timestamp(0) without time zone NOT NULL,
    end_at timestamp(0) without time zone NOT NULL,
    doctor_start_at timestamp(0) without time zone NOT NULL,
    doctor_end_at timestamp(0) without time zone NOT NULL,
    doctor_started_at timestamp(0) without time zone,
    doctor_ended_at timestamp(0) without time zone,
    surgery_id bigint NOT NULL,
    surgical_room_id bigint NOT NULL,
    deleted_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT events_pkey PRIMARY KEY (id),
    CONSTRAINT events_surgery_id_foreign FOREIGN KEY (surgery_id)
        REFERENCES public.surgeries (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT events_surgical_room_id_foreign FOREIGN KEY (surgical_room_id)
        REFERENCES public.surgical_rooms (id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
);