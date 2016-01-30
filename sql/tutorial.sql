CREATE TABLE tutorial_category (
    id integer NOT NULL,
    category character varying NOT NULL
);

--
-- Name: tutorial_category_id_seq; Type: SEQUENCE; Schema: public; Owner: apank
--

CREATE SEQUENCE tutorial_category_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: tutorial_category_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: apank
--

ALTER SEQUENCE tutorial_category_id_seq OWNED BY tutorial_category.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: apank
--

ALTER TABLE ONLY tutorial_category ALTER COLUMN id SET DEFAULT nextval('tutorial_category_id_seq'::regclass);


--
-- Name: tutorial_category_pkey; Type: CONSTRAINT; Schema: public; Owner: apank; Tablespace: 
--

ALTER TABLE ONLY tutorial_category
    ADD CONSTRAINT tutorial_category_pkey PRIMARY KEY (id);

CREATE TABLE tutorial (
    id integer NOT NULL,
    id_category integer NOT NULL,
    title character varying NOT NULL,
    description character varying NOT NULL,
    image character varying,
    date timestamp without time zone DEFAULT now()
);

--
-- Name: tutorial_id_seq; Type: SEQUENCE; Schema: public; Owner: apank
--

CREATE SEQUENCE tutorial_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


--
-- Name: tutorial_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: apank
--

ALTER SEQUENCE tutorial_id_seq OWNED BY tutorial.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: apank
--

ALTER TABLE ONLY tutorial ALTER COLUMN id SET DEFAULT nextval('tutorial_id_seq'::regclass);


--
-- Name: tutorial_pkey; Type: CONSTRAINT; Schema: public; Owner: apank; Tablespace: 
--

ALTER TABLE ONLY tutorial
    ADD CONSTRAINT tutorial_pkey PRIMARY KEY (id);


--
-- Name: tutorial_id_category_fkey; Type: FK CONSTRAINT; Schema: public; Owner: apank
--

ALTER TABLE ONLY tutorial
    ADD CONSTRAINT tutorial_id_category_fkey FOREIGN KEY (id_category) REFERENCES tutorial_category(id) ON UPDATE CASCADE ON DELETE CASCADE;


INSERT INTO tutorial_category VALUES (1, 'Pertama');
INSERT INTO tutorial_category VALUES (2, 'Kedua');

INSERT INTO tutorial VALUES (1, 1, 'Title Pertama Pertama', 'Description Pertama Pertama', '', '2016-01-30 22:00:45.754104');
INSERT INTO tutorial VALUES (2, 1, 'Title Pertama Kedua', 'Description Pertama Kedua', '', '2016-01-30 22:01:02.596191');
INSERT INTO tutorial VALUES (3, 2, 'Title Kedua Pertama', 'Description Kedua Pertama', '', '2016-01-30 22:01:18.660867');
INSERT INTO tutorial VALUES (4, 2, 'Title Kedua Kedua', 'Description Kedua Kedua', '', '2016-01-30 22:01:36.171714');
