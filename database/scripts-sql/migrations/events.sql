CREATE SEQUENCE events_id_seq;
CREATE TABLE public.events
(
    id integer NOT NULL DEFAULT nextval('events_id_seq'::regclass),
    title character varying(70) COLLATE pg_catalog."default" NOT NULL,
    color character varying(7) COLLATE pg_catalog."default" NOT NULL,
    start_at timestamp(0) without time zone NOT NULL,
    end_at timestamp(0) without time zone NOT NULL,
    surgery_id bigint NOT NULL,
    surgical_room_id bigint NOT NULL,
    entrance_at_surgical_center timestamp(0) without time zone,
    entrance_at_surgical_room timestamp(0) without time zone,
    time_out_at timestamp(0) without time zone,
    anesthetic_induction timestamp(0) without time zone,
    surgeon_started_at timestamp(0) without time zone,
    surgeon_ended_at timestamp(0) without time zone,
    exit_surgical_room timestamp(0) without time zone,
    entrance_repai timestamp(0) without time zone,
    exit_repai timestamp(0) without time zone,
    exit_surgery_center timestamp(0) without time zone,
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
