CREATE TABLE climate (
    id integer NOT NULL,
    ch_temp double precision NOT NULL,
    ch_dm double precision NOT NULL,
    temp_dm double precision NOT NULL,
    bobot_ch double precision NOT NULL,
    boobt_temp double precision NOT NULL,
    bobot_dm double precision NOT NULL,
    cr double precision NOT NULL,
    validation boolean DEFAULT true NOT NULL,
    id_user integer,
    date timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.climate OWNER TO apank;

--
-- Name: COLUMN climate.validation; Type: COMMENT; Schema: public; Owner: apank
--

COMMENT ON COLUMN climate.validation IS 'TRUE = valid | FALSE = not valid';


--
-- Name: climate_id_seq; Type: SEQUENCE; Schema: public; Owner: apank
--

CREATE SEQUENCE climate_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.climate_id_seq OWNER TO apank;

--
-- Name: climate_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: apank
--

ALTER SEQUENCE climate_id_seq OWNED BY climate.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: apank
--

ALTER TABLE ONLY climate ALTER COLUMN id SET DEFAULT nextval('climate_id_seq'::regclass);


--
-- Name: climate_pkey; Type: CONSTRAINT; Schema: public; Owner: apank; Tablespace: 
--

ALTER TABLE ONLY climate
    ADD CONSTRAINT climate_pkey PRIMARY KEY (id);
