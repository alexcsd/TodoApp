import React from 'react';
import { Button, Modal, ModalHeader, ModalBody, Form, FormGroup, Label, Input } from 'reactstrap';

class AddTodoItemModal extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            modal: false,
            title:'',
            details:''
        };

        this.toggle = this.toggle.bind(this);
    }

    toggle() {
        this.setState({
            modal: !this.state.modal
        });
    }


    render() {
        return (
            <div>
                <Button color="light" onClick={this.toggle}>{this.props.buttonLabel}</Button>
                <Modal isOpen={this.state.modal} toggle={this.toggle} className={this.props.className}>
                    <ModalHeader toggle={this.toggle}>Modal title</ModalHeader>
                    <ModalBody>
                        <Form onSubmit={this.props.handleSubmit}>
                            <FormGroup>
                                <Label for="title">title</Label>
                                <Input value={this.state.title} onChange={(event) => this.setState({title: event.target.value})} type="text" name="title" id="title" placeholder="Write your todo title" />
                            </FormGroup>
                            <FormGroup>
                                <Label for="title">details</Label>
                                <Input value={this.state.details} onChange={(event) => this.setState({details: event.target.value})} type="text" name="details" id="details" placeholder="Write your todo details" />
                            </FormGroup>
                            <Button type="submit" onClick={() => this.setState({ modal:false})}>Add</Button>
                        </Form>
                    </ModalBody>
                </Modal>
            </div>
        );
    }
}

export default AddTodoItemModal;
