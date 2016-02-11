--
-- Name: landpeat; Type: TABLE; Schema: public; Owner: ketuker; Tablespace: 
--

CREATE TABLE landpeat (
    id integer NOT NULL,
    slope_thick double precision NOT NULL,
    slope_ripe double precision NOT NULL,
    thick_ripe double precision NOT NULL,
    bobot_slope double precision NOT NULL,
    bobot_thick double precision NOT NULL,
    bobot_ripe double precision NOT NULL,
    cr double precision NOT NULL,
    validation boolean,
    id_user integer NOT NULL,
    date timestamp without time zone DEFAULT now() NOT NULL
);



--
-- Name: landpeat_id_seq; Type: SEQUENCE; Schema: public; Owner: ketuker
--

CREATE SEQUENCE landpeat_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

--
-- Name: landpeat_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ketuker
--

ALTER SEQUENCE landpeat_id_seq OWNED BY landpeat.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: ketuker
--

ALTER TABLE ONLY landpeat ALTER COLUMN id SET DEFAULT nextval('landpeat_id_seq'::regclass);


--
-- Data for Name: landpeat; Type: TABLE DATA; Schema: public; Owner: ketuker
--



--
-- Name: landpeat_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ketuker
--

SELECT pg_catalog.setval('landpeat_id_seq', 1, false);


--
-- Name: landpeat_pkey; Type: CONSTRAINT; Schema: public; Owner: ketuker; Tablespace: 
--

ALTER TABLE ONLY landpeat
    ADD CONSTRAINT landpeat_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

