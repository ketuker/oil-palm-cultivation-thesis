CREATE TABLE landpeat (
    id integer NOT NULL,
    slope_thick double precision NOT NULL,
    slope_ripe double precision NOT NULL,
    thick_ripe double precision NOT NULL,
    bobot_slope double precision NOT NULL,
    bobot_thick double precision NOT NULL,
    bobot_ripe double precision NOT NULL,
    cr double precision NOT NULL,
    validation boolean DEFAULT true NOT NULL,
    id_user integer,
    date timestamp without time zone DEFAULT now() NOT NULL
);

CREATE SEQUENCE landpeat_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER SEQUENCE landpeat_id_seq OWNED BY landpeat.id;



ALTER TABLE ONLY landpeat ALTER COLUMN id SET DEFAULT nextval('landpeat_id_seq'::regclass);


ALTER TABLE ONLY landpeat
    ADD CONSTRAINT landpeat_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

