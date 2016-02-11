--
-- Name: landnpeat; Type: TABLE; Schema: public; Owner: ketuker; Tablespace: 
--

CREATE TABLE landnpeat (
    id integer NOT NULL,
    slope_text double precision NOT NULL,
    slope_elev double precision NOT NULL,
    text_elev double precision NOT NULL,
    bobot_slope double precision NOT NULL,
    bobot_text double precision NOT NULL,
    bobot_elev double precision NOT NULL,
    cr double precision NOT NULL,
    validation boolean,
    id_user interval NOT NULL,
    date timestamp without time zone DEFAULT now() NOT NULL
);

--
-- Name: landnpeat_id_seq; Type: SEQUENCE; Schema: public; Owner: ketuker
--

CREATE SEQUENCE landnpeat_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: landnpeat_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: ketuker
--

ALTER SEQUENCE landnpeat_id_seq OWNED BY landnpeat.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: ketuker
--

ALTER TABLE ONLY landnpeat ALTER COLUMN id SET DEFAULT nextval('landnpeat_id_seq'::regclass);


--
-- Data for Name: landnpeat; Type: TABLE DATA; Schema: public; Owner: ketuker
--



--
-- Name: landnpeat_id_seq; Type: SEQUENCE SET; Schema: public; Owner: ketuker
--

SELECT pg_catalog.setval('landnpeat_id_seq', 1, false);


--
-- Name: landnpeat_pkey; Type: CONSTRAINT; Schema: public; Owner: ketuker; Tablespace: 
--

ALTER TABLE ONLY landnpeat
    ADD CONSTRAINT landnpeat_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

