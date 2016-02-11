--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;



CREATE TABLE advusr (
    id integer NOT NULL,
    skenario character varying NOT NULL,
    ch_temp double precision NOT NULL,
    ch_dm double precision NOT NULL,
    temp_dm double precision NOT NULL,
    bobot_ch double precision NOT NULL,
    bobot_temp double precision NOT NULL,
    bobot_dm double precision NOT NULL,
    cr_climate double precision NOT NULL,
    validation_climate boolean NOT NULL,
    slope_text double precision NOT NULL,
    slope_elev double precision NOT NULL,
    text_elev double precision NOT NULL,
    bobot_slopenp double precision NOT NULL,
    bobot_text double precision NOT NULL,
    bobot_elev double precision NOT NULL,
    cr_landnpeat double precision NOT NULL,
    validation_landnpeat boolean NOT NULL,
    slope_thick double precision NOT NULL,
    slope_ripe double precision NOT NULL,
    thick_ripe double precision NOT NULL,
    bobot_slopep double precision NOT NULL,
    bobot_thick double precision NOT NULL,
    bobot_ripe double precision NOT NULL,
    cr_landpeat double precision NOT NULL,
    validation_landpeat boolean NOT NULL,
    road_mills double precision NOT NULL,
    road_town double precision NOT NULL,
    mills_town double precision NOT NULL,
    bobot_road double precision NOT NULL,
    bobot_mills double precision NOT NULL,
    bobot_town double precision NOT NULL,
    cr_accessibility double precision NOT NULL,
    validation_accessibility boolean NOT NULL,
    climate_land double precision NOT NULL,
    climate_accessibility double precision NOT NULL,
    land_accessibility double precision NOT NULL,
    bobot_climate double precision NOT NULL,
    bobot_land double precision NOT NULL,
    bobot_accessibility double precision NOT NULL,
    cr_factors double precision NOT NULL,
    validation_factors boolean NOT NULL,
    id_user integer,
    date timestamp without time zone DEFAULT now() NOT NULL
);


CREATE SEQUENCE advusr_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE advusr_id_seq OWNED BY advusr.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: ketuker
--

ALTER TABLE ONLY advusr ALTER COLUMN id SET DEFAULT nextval('advusr_id_seq'::regclass);


--
-- Name: advusr_pkey; Type: CONSTRAINT; Schema: public; Owner: ketuker; Tablespace: 
--

ALTER TABLE ONLY advusr
    ADD CONSTRAINT advusr_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

