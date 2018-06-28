import React, { Component } from 'react';
// import './App.css';
import { Alert, Container, Navbar, NavbarBrand, Nav, NavItem } from 'reactstrap';
import axios from 'axios';
import TodoItem from './components/TodoItem';
import AddTodoItemModal from './components/AddTodoItemModal';

class App extends Component {
  constructor(props) {
    super(props);

    this.toggleNavbar = this.toggleNavbar.bind(this);
    this.state = {
      collapsed: true,
      todos: [],
      visible: false,
      errors: []
    };
    this.handleSubmit = this.handleSubmit.bind(this);
    this.handleDelete = this.handleDelete.bind(this);
  }

  toggleNavbar() {
    this.setState({
      collapsed: !this.state.collapsed
    });
  }
  
  componentDidMount = ()  => {
    console.log(this.state.errors);
    axios.get(`http://127.0.0.1:8000/api/todos`)
      .then(res => {
        const todos = res.data;
        this.setState({ todos: todos.map( todo => <TodoItem key={todo._id} handleDelete={this.handleDelete}  todo={todo} />) });
      });
  }

  handleDelete(event) {
    const _id = event.target.value;
    axios.delete(`http://127.0.0.1:8000/api/todo/`+_id)
      .then(res => {
        const todos = res.data;
        this.setState({ todos: todos.map(todo => <TodoItem key={todo._id} handleDelete={this.handleDelete}  todo={todo} />) });
      });
  }

  handleSubmit(event) {
    event.preventDefault();
    console.log(event.target.title.value);
    const todo = {
      title: event.target.title.value,
      details: event.target.details.value
    }

    axios.post(`http://127.0.0.1:8000/api/todos`, todo)
      .then(res => {
        const todos = res.data;
        this.setState({ todos: todos.map(todo => <TodoItem key={todo._id} handleDelete={this.handleDelete}  todo={todo} />) });
      })
      // .catch( error => console.log(error.response.data));
    .catch (errors => this.setState({ errors: Object.values(errors.response.data).map(error => <li key={error} >{error}</li>),visible: true }));
  }
  render() {

    return (
      <div>
        <Navbar color="dark" dark>
          <NavbarBrand href="/" className="mr-auto"><h3>Todo App</h3></NavbarBrand>
            <Nav navbar>
              <NavItem>
              <AddTodoItemModal handleSubmit={this.handleSubmit} buttonLabel={'Add todo item'} />
              </NavItem>
            </Nav>
        </Navbar>
        <Container className="mt-5">
          <Alert color='danger' isOpen={this.state.visible} >{this.state.errors}</Alert>
          {this.state.todos}
        </Container>
      </div>
    );
  }
}

export default App;
