
CREATE TABLE landnpeat (
    id integer NOT NULL,
    slope_text double precision NOT NULL,
    slope_elev double precision NOT NULL,
    text_elev double precision NOT NULL,
    bobot_slope double precision NOT NULL,
    bobot_text double precision NOT NULL,
    bobot_elev double precision NOT NULL,
    cr double precision NOT NULL,
    validation boolean DEFAULT true NOT NULL,
    date timestamp without time zone DEFAULT now() NOT NULL,
    id_user integer
);


CREATE SEQUENCE landnpeat_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE landnpeat_id_seq OWNED BY landnpeat.id;



ALTER TABLE ONLY landnpeat ALTER COLUMN id SET DEFAULT nextval('landnpeat_id_seq'::regclass);



ALTER TABLE ONLY landnpeat
    ADD CONSTRAINT landnpeat_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

