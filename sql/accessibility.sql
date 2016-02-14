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


CREATE TABLE accessibility (
    id integer NOT NULL,
    road_mills double precision NOT NULL,
    road_town double precision NOT NULL,
    mills_town double precision NOT NULL,
    bobot_road double precision NOT NULL,
    bobot_mills double precision NOT NULL,
    bobot_town double precision NOT NULL,
    cr double precision NOT NULL,
    validation boolean DEFAULT true NOT NULL,
    id_user integer,
    date timestamp without time zone DEFAULT now()
);



CREATE SEQUENCE accessibility_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;



ALTER SEQUENCE accessibility_id_seq OWNED BY accessibility.id;



ALTER TABLE ONLY accessibility ALTER COLUMN id SET DEFAULT nextval('accessibility_id_seq'::regclass);


--
-- Name: accessibility_pkey; Type: CONSTRAINT; Schema: public; Owner: ketuker; Tablespace: 
--

ALTER TABLE ONLY accessibility
    ADD CONSTRAINT accessibility_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

